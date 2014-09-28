INSERT INTO `users` ( `user_nickname`, `user_team`, `user_email`, `user_real_name`, `user_phone`, `user_class`, `user_failed_logins`, `user_last_failed_login`, `user_rememberme_token`, `user_first_login`, `user_type`, `user_has_avatar`, `user_password_hash`) VALUES
( '测试用户1', '测试队伍1', 'demo001@demo.com', '科协网站组', '123456', '科协网站组', 0, NULL, '92fe2365368ff5335d9fd5a73f61541d58bdc799fd70fc59cc1bb7324fc30c17', 0, 'admin', 0, '$2y$10$cMx.NPLQFVw5T/ZN5g0WheOVZbnQmgPcDgMvuOj1tttbDy1NMoJz6'),
( '测试用户2', '测试队伍1', 'demo002@demo.com', '科协网站组', '123456', '科协网站组', 0, NULL, NULL, 0, 'guest', 0, '$2y$10$c9ZI13nQAhpCH2QjvCo2wODGif7V3hpcsEtZUB8jrzcZcpFFaGefO'),
( '测试用户3', '测试队伍1', 'demo003@demo.com', '科协网站组', '123456', '科协网站组', 0, NULL, NULL, 0, 'guest', 0, '$2y$10$A9Xvw.uobq9J1zU/KUm.Du09ebfLK6mphuovnpZkDfRyiNuCqtUpC'),
( '测试用户4', '测试队伍2', 'demo004@demo.com', '科协网站组', '123456', '科协网站组', 0, NULL, NULL, 0, 'guest', 0, '$2y$10$yLVA8Vg1pJWLpZawyxRvoOMpyQJhcn0E97pMLrP.eRp91trgq6pf6'),
( '测试用户5', '测试队伍2', 'demo005@demo.cpm', '科协网站组', '123456', '科协网站组', 0, NULL, NULL, 0, 'guest', 0, '$2y$10$Z.MhkYwZXBRpRjVCnsU7CO1wTRxodT6fNa.FF1H9cetTCp6UMUvAi'),
( '测试用户6', NULL, 'demo006@demo.com', '科协网站组', '123456', '科协网站组', 0, NULL, NULL, 1, 'guest', 0, '$2y$10$5TXQEXKK6fKlI3PbJVsYfO0XdDxd/i2rgkoFFaNAF2J7PqehD61JK'),
( '测试用户7', '测试队伍3', 'demo007@demo.com', '科协网站组', '12345678901', '科协网站组', 0, NULL, NULL, 0, 'guest', 0, '$2y$10$bHcdaQfVI6LKzbfdxadWAOy.5MzxMZd4flJ.WcLv36zJ42w1DRIPe'),
( '测试用户8', '测试队伍3', 'demo008@demo.com', '科协网站组', '12345678901', '科协网站组', 0, NULL, NULL, 0, 'guest', 0, '$2y$10$vBYIbpeR.4amExRoqjPm7.nu7YNP0DYWUkNvsrxXop6mWOQoekerW'),
( '测试用户9', '测试队伍3', 'demo009@demo.com', '科协网站组', '12345678901', '科协网站组', 0, NULL, NULL, 0, 'guest', 0, '$2y$10$cwIHia/Nic5Nbach8Num5epVH5ZPjd7JV2BfPjr/r.TUmVMg5LNTi'),
( '测试用户10', NULL, 'demo010@demo.com', '科协网站组', '12345678901', '科协网站组', 0, NULL, NULL, 1, 'guest', 0, '$2y$10$8lG9Wm7JRdOUJtX4f/75E.jyiZikK39UOLmQBCypX.AqnI06kfLnW');

INSERT INTO `teams` ( `team_name`, `team_password_hash`, `team_slogan`, `team_captain`, `team_member1`, `team_member2`, `team_full`) VALUES
( '测试队伍1', '$2y$10$R.XI/mXcioSTlvJAZFN.het.rPEmHYCCRzmu4V2Yrs87iPV9jtFPe', '这是一个口号！', 1, 2, 3, 1),
( '测试队伍2', '$2y$10$JdG6vQ9XV7bLQCEwGoSTLOpzwCrfFIAHE3CaERgN2/nVaklrBmOue', '这是另一个口号！', 4, 5, 0, 0),
( '测试队伍3', '$2y$10$lEGRNJK3KsglJMyO.z2W8eQpxjZU7IiLcor/4duE8jAlxtwdpx22W', '这是第3个口号！', 7, 9, 8, 1);

#message
INSERT INTO `info`.`message`(`message_id`,`message_from_id`,`message_to_id`,`message_title`,`message_content`,`message_send_date`,`message_is_read`,`message_type`) VALUES
(
