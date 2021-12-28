select n_name from customer, orders, nation where c_custkey=o_custkey and c_nationkey=n_nationkey group by n_name 
having count()=(select count(c_custkey)as C from customer, orders, nation where c_custkey=o_custkey and c_nationkey=n_nationkey group by n_name 
order by C DESC limit 1);