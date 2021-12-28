select count(distinct o_orderkey) from orders,customer,supplier,lineitem where o_custkey=c_custkey and l_orderkey=o_orderkey 
and l_suppkey=s_suppkey and c_acctbal<0 and s_acctbal>0;