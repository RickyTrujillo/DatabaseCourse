select count() from supplier, nation, (select ps_suppkey, ps_partkey, ps_supplycost*ps_availqty as total from partsupp order by total desc 
limit 0.03*(select count(ps_partkey) from partsupp))sq1 
where s_nationkey=n_nationkey and s_suppkey=sq1.ps_suppkey and n_name='CANADA';