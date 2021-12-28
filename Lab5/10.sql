select r_name, count() from customer, nation, region where n_nationkey=c_nationkey and n_regionkey=r_regionkey 
and c_custkey not in (Select c_custkey from customer, orders where c_custkey=o_custkey) and c_acctbal > (select avg(c_acctbal) from customer)
group by r_name;