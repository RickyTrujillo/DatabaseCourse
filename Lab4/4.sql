select s_name, count(p_partkey) from part, supplier,nation, partsupp where s_nationkey=n_nationkey and p_partkey=ps_partkey 
and s_suppkey=ps_suppkey and n_name='BRAZIL' 
and p_size<20 group by s_name;