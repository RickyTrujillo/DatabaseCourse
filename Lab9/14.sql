select Q2.s_region, Q1.c_region, Cast(sum(l_extendedprice) as INTEGER) from Q1, Q2,lineitem,orders where o_orderkey=l_orderkey and Q1.c_custkey=o_custkey and 
l_suppkey=Q2.s_suppkey group by Q2.s_region, Q1.c_region;


