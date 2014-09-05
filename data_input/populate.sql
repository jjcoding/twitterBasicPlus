LOAD DATA
LOCAL INFILE "data/Users.txt"
REPLACE INTO TABLE Users
FIELDS TERMINATED BY '|'
(userID, name, email, pwd);

LOAD DATA
LOCAL INFILE "data/Tweets.txt"
REPLACE INTO TABLE Tweets
FIELDS TERMINATED BY '|'
(tweetID, tweet, time_stamp, userID);

LOAD DATA
LOCAL INFILE "data/Messages.txt"
REPLACE INTO TABLE Messages
FIELDS TERMINATED BY '|'
(messageID, text, time_stamp, senderID, receiverID);

LOAD DATA
LOCAL INFILE "data/Retweet.txt"
REPLACE INTO TABLE Retweet
FIELDS TERMINATED BY '|'
(tweetID, userID);

LOAD DATA
LOCAL INFILE "data/Likes.txt"
REPLACE INTO TABLE Likes
FIELDS TERMINATED BY '|'
(tweetID, userID);

LOAD DATA
LOCAL INFILE "data/Reply.txt"
REPLACE INTO TABLE Reply
FIELDS TERMINATED BY '|'
(commentID, beCommentedID);

LOAD DATA
LOCAL INFILE "data/Follows.txt"
REPLACE INTO TABLE Follows
FIELDS TERMINATED BY '|'
(followerID, leaderID);
