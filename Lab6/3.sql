select count() from (select ps_partkey from nation, supplier, partsupp where s_suppkey=ps_suppkey and s_nationkey=n_nationkey and 
n_name='CANADA' group by ps_partkey having count()>1);