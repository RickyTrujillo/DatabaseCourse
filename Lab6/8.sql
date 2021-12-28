select count(distinct c_custkey)from customer, orders where c_custkey = o_custkey
and o_orderkey not in(select distinct o_orderkey from lineitem,orders, supplier, nation,region 
where l_orderkey = o_orderkey and s_suppkey = l_suppkey and s_nationkey = n_nationkey and r_regionkey = n_regionkey
and r_name not in('ASIA'));