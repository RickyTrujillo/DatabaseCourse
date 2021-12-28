select p_name from part,supplier,nation,lineitem,region where p_partkey=l_partkey and l_suppkey=s_suppkey and s_nationkey=n_nationkey 
and n_regionkey=r_regionkey and r_name='ASIA' group by p_name having count(distinct s_suppkey)=4;