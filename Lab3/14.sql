SELECT COUNT(o_orderpriority) from orders WHERE o_customerkey IN
(SELECT c_custkey FROM customer WHERE c_nationkey IN
(SELECT n_nationkey FROM nation WHERE n_name='BRAZIL'))
AND o_orderpriority = '1-URGENT' AND o_orderdate BETWEEN '1994-01-01' AND '1997-31-12';