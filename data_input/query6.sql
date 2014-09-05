/*Users who sent a message before 2013*/
SELECT users.name
FROM messages join users
on messages.senderID = users.userID
AND time_stamp < '2013-01-01 00:00:00';

/*Emails of users who tweeted about Chicago*/
SELECT users.name, users.email
FROM tweets join users
on tweets.userID = users.userID
AND tweets.tweet like '%Chicago%';


/*User names and the number of their retweets*/
SELECT users.name, COUNT(tweetID)
FROM retweet NATURAL LEFT OUTER JOIN users
GROUP BY users.userID;

/* User names and number of comments on their tweets*/
SELECT A.name, COUNT(tweetID)
FROM
(SELECT *
FROM tweets NATURAL join users
) AS A JOIN reply 
ON beCommentedID = tweetID
GROUP BY userID
;

/*user names and counts of tweets they like*/
SELECT name, COUNT(tweetID)
FROM likes JOIN users
ON likes.userID = users.userID
GROUP BY users.userID;


/*People who they like their own tweets and these tweets*/
SELECT name, tweet
FROM
(SELECT *
FROM tweets NATURAL JOIN likes
) AS A JOIN users 
ON A.userID = users.userID;


/*People who tweeted in 2012*/
SELECT name, tweet , time_stamp
FROM tweets JOIN users
ON time_stamp < '2013-01-01 00:00:00' 
AND  time_stamp > '2012-01-01 00:00:00'
AND tweets.userID = users.userID;


/*Users and number of messages sent*/
SELECT name, COUNT(messageID)
FROM messages JOIN users
ON userID = senderID
GROUP BY userID;


/*Users received messages from 'TheRock' and the number of messages they received*/
SELECT name, COUNT(messageID)
FROM messages JOIN users
ON userID = receiverID
AND senderID = 'TheRock'
GROUP BY userID;

/*People tweets about Chicago, and afflied with UChicago */
SELECT name
FROM tweets JOIN users
ON email like '%uchicago%'
AND tweet like '%Chicago%'
AND tweets.userID = users.userID;



/*Queries added*/



/*the author of the latest tweet, and the time stamp*/

SELECT name, MAX(time_stamp)
FROM users JOIN tweets 
USING (userID);



/*The user who has most tweets*/

SELECT users.name
FROM users NATURAL JOIN tweets
GROUP BY userID
HAVING COUNT(*) >= ALL
(SELECT COUNT(*)
FROM tweets
GROUP BY userID);


/*Authors of tweets about 'Chicago', and these tweets*/

SELECT users.name, tweets.tweet
FROM users JOIN tweets
ON tweet like '%Chicago%'
AND users.userID = tweets.userID
ORDER BY name;



/*The user with most followers*/

SELECT name
FROM users JOIN follows
ON users.userID = follows.leaderID
GROUP BY follows.leaderID
HAVING COUNT(*) >= ALL
(SELECT COUNT(*)
FROM follows
GROUP BY follows.leaderID);


/*Among those who are affiliated with UChicago, the one who sends most messages*/

SELECT users.name
FROM users JOIN messages
ON userID = senderID
AND users.email LIKE '%uchicago%'
GROUP BY userID
HAVING COUNT(*) >= ALL
(SELECT COUNT(*)
FROM messages
GROUP BY senderID);

/*Users who have the same number of followers as Bill Clinton do*/

SELECT users.name
FROM users JOIN follows
ON userID = leaderID
AND users.name <> 'Bill Clinton'
GROUP BY userID
HAVING COUNT(*) = 
(SELECT COUNT(*)
FROM follows JOIN users
ON follows.leaderID = users.userID
AND users.name = 'Bill Clinton');


/*the users affiliated with UChicago who have ever posted more than two tweets  */

SELECT U.name
FROM 
(SELECT *
FROM users
WHERE email LIKE '%uchicago%'
) AS U
NATURAL RIGHT OUTER JOIN tweets
GROUP BY tweets.userID
HAVING COUNT(U.userID) > 2
;






/*Messages between UChicago students and Harvard students, the sender and the receiver*/ 
/*
SELECT M.text, C.A.name, C.B.name
FROM
(SELECT *
FROM users A JOIN users B
ON A.email LIKE '%uchicago%' AND B.email LIKE '%harvard%'
) AS C
JOIN messages M
ON (M.senderID = C.A.userID AND M.receiverID = C.B.userID)
OR (M.senderID = C.B.userID AND M.receiverID = C.A.userID);
*/


