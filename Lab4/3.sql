select n_name, count(o_custkey) from nation,customer, orders,region where o_custkey=c_custkey and c_nationkey=n_nationkey and n_regionkey=r_regionkey and r_name='EUROPE'
group by n_name;