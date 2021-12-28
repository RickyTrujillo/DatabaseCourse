select n_name, count(distinct o_orderkey) from nation, orders, supplier, region,lineitem where n_regionkey=r_regionkey 
and n_nationkey = s_nationkey and o_orderstatus='F' and s_suppkey=l_suppkey 
and l_orderkey=o_orderkey and r_name='AMERICA' and o_orderdate like '1995%' group by n_name;