-- MyBad — script de création de la base de données
-- Compatible MySQL / MariaDB (Laragon)
-- Usage : à importer via HeidiSQL, phpMyAdmin, ou `mysql -u root < mybad.sql`

CREATE DATABASE IF NOT EXISTS mybad
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE mybad;

CREATE TABLE IF NOT EXISTS excuses (
    id         INT AUTO_INCREMENT PRIMARY KEY,
    http_code  INT NOT NULL UNIQUE,
    tag        VARCHAR(100) NOT NULL,
    message    VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO excuses (http_code, tag, message) VALUES
(701, 'Inexcusable', 'Meh'),
(703, 'Inexcusable', 'Explosion'),
(704, 'Inexcusable', 'Goto Fail'),
(706, 'Inexcusable', 'Delete Your Account'),
(710, 'Novelty Implementations', 'PHP'),
(711, 'Novelty Implementations', 'Convenience Store'),
(712, 'Novelty Implementations', 'NoSQL'),
(718, 'Novelty Implementations', 'I am not a teapot'),
(719, 'Novelty Implementations', 'Haskell'),
(720, 'Edge Cases', 'Unpossible'),
(721, 'Edge Cases', 'Known Unknowns'),
(722, 'Edge Cases', 'Unknown Unknowns'),
(723, 'Edge Cases', 'Tricky'),
(724, 'Edge Cases', 'This line should be unreachable'),
(725, 'Edge Cases', 'It works on my machine'),
(726, 'Edge Cases', 'It''s a feature, not a bug'),
(727, 'Edge Cases', '32 bits is plenty'),
(728, 'Edge Cases', 'It works in my timezone'),
(730, 'Fucking', 'Fucking npm'),
(731, 'Fucking', 'Fucking Rubygems'),
(732, 'Fucking', 'Fucking Unic💩de'),
(733, 'Fucking', 'Fucking Deadlocks'),
(734, 'Fucking', 'Fucking Deferreds'),
(735, 'Fucking', 'Fucking IE'),
(737, 'Fucking', 'FuckThreadsing'),
(738, 'Fucking', 'Fucking Exactly-once Delivery'),
(739, 'Fucking', 'Fucking Windows'),
(740, 'Fucking', 'Fucking McAfee'),
(750, 'Syntax Errors', 'Didn''t bother to compile it'),
(753, 'Syntax Errors', 'Syntax Error'),
(754, 'Syntax Errors', 'Too many semi-colons'),
(755, 'Syntax Errors', 'Not enough semi-colons'),
(756, 'Syntax Errors', 'Insufficiently polite'),
(757, 'Syntax Errors', 'Excessively polite'),
(759, 'Syntax Errors', 'Unexpected `T_PAAMAYIM_NEKUDOTAYIM`'),
(761, 'Substance', 'Hungover'),
(762, 'Substance', 'Stoned'),
(763, 'Substance', 'Under-Caffeinated'),
(764, 'Substance', 'Over-Caffeinated'),
(765, 'Substance', 'Railscamp'),
(766, 'Substance', 'Sober'),
(767, 'Substance', 'Drunk'),
(768, 'Substance', 'Accidentally took sleeping pills instead of migraine pills during crunch week'),
(780, 'Somebody Else''s Problem', 'Project owner not responding'),
(781, 'Somebody Else''s Problem', 'Operations'),
(782, 'Somebody Else''s Problem', 'QA'),
(783, 'Somebody Else''s Problem', 'It was a customer request, honestly'),
(784, 'Somebody Else''s Problem', 'Management, obviously'),
(785, 'Somebody Else''s Problem', 'TPS Cover Sheet not attached'),
(786, 'Somebody Else''s Problem', 'Try it now'),
(787, 'Somebody Else''s Problem', 'Further Funding Required'),
(788, 'Somebody Else''s Problem', 'Designer''s final designs weren''t'),
(789, 'Somebody Else''s Problem', 'Not my department'),
(791, 'Internet Crashed', 'The Internet shut down due to copyright restrictions'),
(792, 'Internet Crashed', 'Climate change driven catastrophic weather event'),
(793, 'Internet Crashed', 'Zombie Apocalypse'),
(794, 'Internet Crashed', 'Someone let PG near a REPL'),
(795, 'Internet Crashed', '#heartbleed (see 705)'),
(796, 'Internet Crashed', 'Some DNS fuckery idno'),
(797, 'Internet Crashed', 'This is the last page of the Internet. Go back'),
(798, 'Internet Crashed', 'I checked the DB backups cupboard and the cupboard was bare'),
(799, 'Internet Crashed', 'End of the world');
