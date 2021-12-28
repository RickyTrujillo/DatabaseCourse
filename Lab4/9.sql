select count(distinct o_clerk) from nation,orders,supplier, lineitem where l_orderkey=o_orderkey and l_suppkey=s_suppkey 
and n_nationkey=s_nationkey and n_name='RUSSIA';