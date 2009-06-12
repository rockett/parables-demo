CREATE TABLE applog (id INTEGER PRIMARY KEY AUTOINCREMENT, message VARCHAR(2147483647) NOT NULL, priority INTEGER NOT NULL, priority_name VARCHAR(32) NOT NULL, timestamp DATETIME NOT NULL);
CREATE TABLE session (id CHAR(32), modified INTEGER, lifetime INTEGER, data VARCHAR(2147483647), PRIMARY KEY(id));
CREATE TABLE worklog (id INTEGER PRIMARY KEY AUTOINCREMENT, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL);
CREATE TABLE entry (id INTEGER PRIMARY KEY AUTOINCREMENT, opened DATETIME NOT NULL, closed DATETIME NOT NULL, notes LONGTEXT, worklog_id INTEGER NOT NULL);
