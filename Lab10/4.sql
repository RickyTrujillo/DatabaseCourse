create trigger t6 after delete on part for each row when (OLD.p_partkey in (select l_partkey from lineitem UNION select ps_partkey from partsupp))
begin
delete from lineitem where OLD.p_partkey = l_partkey;
delete from partsupp where OLD.p_partkey=ps_partkey;
end;

delete from part where p_partkey in (select ps_partkey from partsupp, supplier, nation where ps_suppkey=s_suppkey and n_nationkey=n_nationkey and (n_name='FRANCE' or n_name='GERMANY'));

select avg(ps_supplycost), n_name from partsupp, nation, region, supplier where ps_suppkey=s_suppkey and n_nationkey=s_nationkey and n_regionkey=r_regionkey and r_name='EUROPE' group by n_name;