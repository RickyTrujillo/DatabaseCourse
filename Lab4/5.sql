select c_name, count() from customer, nation, orders where o_custkey=c_custkey and c_nationkey=n_nationkey
 and n_name='GERMANY' and o_orderdate like '1995%'
group by c_name;