SELECT posts.user_id,
       (COUNT(posts.id)/
          (SELECT TIMESTAMPDIFF(MONTH, users.created_at, posts.created_at)+1)) AS monthly_average,
       (COUNT(posts.id)/
          (SELECT TIMESTAMPDIFF(WEEK, users.created_at, posts.created_at)+1)) AS weekly_average
FROM posts
JOIN users ON posts.user_id=users.id
GROUP BY posts.user_id
