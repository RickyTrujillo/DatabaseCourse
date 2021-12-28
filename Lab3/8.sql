SELECT S.s_name, S.s_acctbal FROM supplier S 
WHERE S.s_nationkey IN
(SELECT N.n_nationkey FROM nation N WHERE N.n_regionkey IN
(SELECT R.r_regionkey from region R WHERE R.r_name = 'ASIA'))
AND S.s_acctbal>=1000;