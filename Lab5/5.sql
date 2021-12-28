select s_name, p_size, min(ps_supplycost) from nation, region, supplier, part, partsupp where p_partkey=ps_partkey 
and n_nationkey=s_nationkey and r_regionkey=n_regionkey and ps_suppkey=s_suppkey and r_name='AMERICA' and p_type like '%STEEL'
 group by p_size order by s_name;