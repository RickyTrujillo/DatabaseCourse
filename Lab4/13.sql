select count(distinct o_orderkey) from region, nation n1, nation n2, customer, lineitem, supplier, orders where 
s_nationkey=n1.n_nationkey and n1.n_regionkey=r_regionkey 
and o_orderkey=l_orderkey and o_custkey=c_custkey and c_nationkey=n2.n_nationkey 
and l_suppkey = s_suppkey and n2.n_name='CANADA' and r_name='EUROPE';
