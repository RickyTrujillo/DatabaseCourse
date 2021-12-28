select r1.r_name, count(distinct s_name) from supplier, nation, region r1,
(Select avg(s_acctbal) as acctbal2, r_regionkey from supplier, nation, region where n_nationkey=s_nationkey and n_regionkey=r_regionkey 
group by r_name)sq1
where n_nationkey=s_nationkey and n_regionkey=r1.r_regionkey and s_acctbal > sq1.acctbal2 
and sq1.r_regionkey = r1.r_regionkey group by r1.r_name;