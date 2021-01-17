# Timelog

* PROJECT NAME
* Christopher Kelly
* 2313175
* Ron Poet

## Guidance

* This file contains the time log for your project. It will be submitted along with your final dissertation.
* **YOU MUST KEEP THIS UP TO DATE AND UNDER VERSION CONTROL.**
* This timelog should be filled out honestly, regularly (daily) and accurately. It is for *your* benefit.
* Follow the structure provided, grouping time by weeks.  Quantise time to the half hour.

## Week 1 (11)
### 21 Oct 2019
* Changed project as the previous one ran into issues
## 23 Oct 2019
* *0.5 hours* meeting with supervisor, discussed project requirements
## 25 Oct 2019
* *3 hours* - Researched tools and web programming languages
* *2 hours* - Researched potential design choices for vulnerabilities
* *5 hours* - Web development tutorials and videos.
## 26 Oct 2019
* *1 hour* - Read "Web hackers handbook" for ideas about vulnerabilties and common mitigations
* *3.5 hours* - Researched SQLi, XSS and file upload vulnerabilities plus mitigations.


## Week 2 (15)
## 28 Oct 2019
* *0 hours* - no meeting with supervisor, would be next week instead
* *5 hours* - Attempted and researched similiar applications (OWASP,bWAPP,Portswigger etc)
* *1 hour* - Researched Docker and started coding the application container
* *2 hours* - Created database schema, issues with integrating with Docker, solved issues.
## 29 Oct 2019
* *3 hours* - Got barebones website up and running, decided on E-commerce style.
* *1 hour* - Created basic file directory layout and researched SQLi implementation.
## 1 NOV 2019
* *2 hours* - Created 2 SQLi vulnerabilties in login page and proof of concepts.
* *0.5 hours* - created database schema populations script to save time if a mistake was made.
* *0.5 hours* - completed migration from PHPmyadmin to live independent website with independent database system

## Week 3 (14)
## 4 NOV 2020
* *0.5 hours* - meeting with supervisor, discussed progress so far, decided next focus should be on XSS vulerability.
* *0.5 hours* - meeting identified potential issue with giving users population script, gives away credentials. No solution found after brainstorming.
* *1 hour* - researched stored XSS and decided to implement on item searching page.
* *3 hours* - created search bar for items, alongside another SQli vuln in one parameter and a proof of concept.
## 6 NOV 2020
* *2 hours* - ran into issues implementing category filter bar, solved. Got to work on individual item pages.
* *3 hours* - created a review system for each item, had to update database schema. Review system has XSS vulnerability.
## 7 NOV 2020
* *4 hours* - proof of concept for XSS and added a new input filter to XSS so it would not be too easy for users.

## Week 4 (12)
## 11 NOV 2020
* *0.5 hours* - meeting with supervisor, next focus would be file upload vulnerabilties, also recommended to revamp login system.
* *0.5 hours* - edited database schema and populations script to handle different user classes.
* *1.5 hours* - researched and implemented cookie based session management but testing revealed apparently unsolvable issues, solve tomorrow.
## 13 NOV 2020
* *1 hour* - Discarded cookies in favour of built in session management
* *0.5 hours* - revamped login systems - 1 for each user class.
* *3.5 hours* - created file upload vulnerability in new item upload page, decided to restrict access to the page. revamped schema to add images to items.
* *0.5 hours* - restricted access to pages that should be visible to certain user classes only.
## 14 NOV 2020
* *2 hours* - created reset buttons as per the initial specification of the project. Had to edit docker container to install python - took a while.
* *2 hours* - Fixed broken comment system and fixed error with reset buttons.

## Week 5 (12.5)
## 18 NOV 2020
* *0.5 hours* - meeting with supervisor, discussed implementation of logic flaws within the project. Showed evidence of vulnerabilties in form of video.
## 20 NOV 2020
* *5 hours* - Implemented checkout system, resolved issue with reset button as I had changed directory layout but not updated accordingly. Numerous money related logic errors involved.
## 21 NOV 2020
* *7 hours* - Created profile section of website for users containing user access vulnerabilities and added a hidden admin section with new access vulnerability.

## Week 6 (0.5)
## 25 NOV 2020
* *0.5 hours* - meeting with supervisor, plan is to make sure that at a minimum there is 2 of each vulnerability
* This week is also assignment week, so less time will be spent on project.


## Week 7 (30)
## 1 DEC 2020
* *0.5 hours* - meeting with supervisor, aim is to make the website presentable to users
## 2 DEC 2020
* *7 hours* - CSS tutorials plus basic design of website and initial template created
## 3 DEC 2020
* *7 hours* - extended website template for every page to implement, added reset buttons to every page. 
* *0.5 hours* - Added reflected XSS in one cookie based scenario.
## 4 DEC 2020
* *8 hours* - tested every part of the website, issue with specific reset buttons and comment system broken. Solved another CSS related issue with profile and login rendering.
## 5 DEC 2020
* *2 hours* - removed database creation script in favour of linking the creation of the local docker container to one containing the database.
* *5 hours* - Fixed broken comment system and fixed error with reset buttons.


## Week 8
## 16 DEC 2020
* *0.5 hours* - meeting with supervisor
* *0 hours* - end of semester, no work over much needed holiday.
* *2 hours* - created status reports and videos sent to supervisor of progress.


# SEMESTER 2
## Week 1 (13.5)
## 8 JAN 2020
* *0.5 hours* - meeting with supervisor,
## 10 JAN 2020
* *5 hours* - started onto the dissertation, reading through sample projects and creating a plan
## 16 JAN 2020
* *2 hours* - Compiled together notes and minutes during semester 1 and started on a sample user evaluation.
## 17 JAN 2020
* *6 hours* - collected proof of concept evidence, wrote user documentation and started writing section on design in dissertation
