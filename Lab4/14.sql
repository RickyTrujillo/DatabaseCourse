select r1.r_name, r2.r_name, sum(l_extendedprice) from region r1, region r2,nation n1, nation n2, lineitem, supplier, orders,customer where 
n2.n_nationkey=c_nationkey and n2.n_regionkey=r2.r_regionkey and n1.n_regionkey=r1.r_regionkey and n1.n_nationkey=s_nationkey
and l_suppkey=s_suppkey and o_orderkey=l_orderkey and c_custkey=o_custkey
group by r1.r_name, r2.r_name;