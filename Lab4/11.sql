select r_name, s_name from region, supplier, nation where n_nationkey=s_nationkey and n_regionkey=r_regionkey
group by r_name having max(s_acctbal);