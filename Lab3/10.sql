SELECT ROUND(SUM(o_totalprice),2) FROM orders WHERE o_custkey IN
(SELECT c_custkey FROM customer WHERE c_nationkey IN
(SELECT n_nationkey FROM nation WHERE n_regionkey IN
(SELECT r_regionkey FROM region WHERE r_name ='EUROPE'))) 
AND o_orderdate LIKE '1996%';