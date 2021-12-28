select s_name, count(p_partkey) from Q2,part, partsupp where p_partkey=ps_partkey 
and s_suppkey=ps_suppkey and s_nation='BRAZIL' and p_size<20 group by s_name;