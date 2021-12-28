SELECT ROUND(AVG(c_acctbal),10) FROM customer WHERE c_nationkey IN
(SELECT n_nationkey FROM nation WHERE n_regionkey IN
(SELECT r_regionkey FROM region WHERE r_name = 'EUROPE'))
AND c_mktsegment = 'MACHINERY';