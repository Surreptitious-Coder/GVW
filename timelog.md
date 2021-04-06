# Timelog

* Demonstrator for website security problems
* Christopher Kelly
* 2313175k
* Ron Poet

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


## Week 2 (17)
## 28 Oct 2019
* *0 hours* - no meeting with supervisor, would be next week instead
* *5 hours* - Attempted and researched similiar applications (OWASP,bWAPP,Portswigger etc)
* *1 hour* - Researched Docker and started coding the application container
* *2 hours* - Created database schema, issues with integrating with Docker, solved issues.
## 29 Oct 2019
* *3 hours* - Got barebones website up and running, decided on E-commerce style.
* *1 hour* - Created basic file directory layout and researched SQLi implementation.
## 1 NOV 2019
* *4 hours* - Created 2 SQLi vulnerabilties in login page and proof of concepts.
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


## Week 8 (2.5)
## 16 DEC 2020
* *0.5 hours* - meeting with supervisor
* *0 hours* - end of semester, no work over much needed holiday.
* *2 hours* - created status reports and videos sent to supervisor of progress.


# SEMESTER 2
## Week 1 (14.5)
## 9 JAN 2021
* *0.5 hours* - meeting with supervisor, discussed future plans with regards to user evaluation
## 10 JAN 2021
* *6 hours* - started onto the dissertation, reading through sample projects and creating a plan
## 11 JAN 2021
* *2 hours* - Compiled together notes and minutes during semester 1 and started on a sample user evaluation.
## 12 JAN 2021
* *6 hours* - collected proof of concept evidence, wrote user documentation and started writing section on design in dissertation

## Week 2 (15.5)
## 19 JAN 2021
* *0.5 hours* - meeting with supervisor, presented evaluation plan
## 20 JAN 2021
* *4 hours* - conducted pilot study with a user
## 21 JAN 2021
* *5 hours* - Fixed errors found in pilot study
* *1 hour* - updated user docummentation and re-conducted flawed aspects of pilot study
## 22 JAN 2021
* *5 hours* - Created dissertation diagrams in design section, finished design section and researched sources on user interface evaluations

## Week 3 (13.5)
## 26 JAN 2021
* *0.5 hours* - meeting with supervisor, discussed pilot study and plans to carry out user evaluations
## 27 JAN 2021
* *4.5 hours* - Found users for the evaluations, ensured everything went well and collected data on most of them.
## 28 JAN 2021
* *5.5 hours* - aggregated and analysed data from the user evaluations
## 29 JAN 2021
* *3 hours* - conducted further interviews with users based on their responses to gather further data

## Week 4 (15)
## 2 FEB 2021
* *0.5 hours* - meeting with supervisor, discussed what should be in the implementation section of the dissertation
## 3 FEB 2021
* *9 hours* - made susbtantial progress with the implementation section, writing and gathering all of the evidence for each vulnerabilities.
## 4 FEB 2021
* *5.5 hours* - completed the implementation, design and analysis sections.

## Week 5 (13.5)
## 9 FEB 2021
* *0.5 hours* - meeting with supervisor, discussed how to complete the background and user evaluation sections
## 10 FEB 2021
* *10 hours* - found sources for background section, completed background section, created tables for user evaluations, completed user evaluation sections
## 14 FEB 2021
* *3 hours* - found sources for background section, completed background section, created tables for user evaluations, completed user evaluation sections


## Week 6 (12)
## 15 FEB 2021
* *6 hours* - Completed first dissertation draft
## 16 FEB 2021
* *6 hours* - Made fixes to UI and other bugs as recommended by users

## Week 7 (0.5)
## 23 FEB 2021
* *0.5 hours* - meeting with supervisor, submitted and discussed first draft of the dissertation
* *0 hours* - had to wait for supervisor to read dissertation draft

## Week 8 (15.5)
## 2 MAR 2021
* *0.5 hours* - meeting with supervisor, discussed first draft and changes that were needed.
## 3 - 7 MAR 2021
* *15 hours* - over the next few days rewrote different sections of the dissertation, sent draft to parents and corrected mistakes, another small test run with same pilot study participant to make sure all was in order and various other small project touch ups


## Week 9 (0.5)
## 9 MAR 2021
* *0.5 hours* - meeting with supervisor, discussed impending deadlines 
* Assessment deadlines fast approaching, had to take the week off to meet deadlines


## Week 10 (14.5)
## 16 MAR 2021
* *0.5 hours* - meeting with supervisor, went in-depth in the 2nd draft of the dissertation and noted corrections
* *4.5 hours* - Made recommended changes to the design, evaluation and implementation sections
## 17 MAR 2021
* *5.5 hours* - Grammar checked the entire dissertation, also took section by section and put it into microsoft word, made the diagrams more clear
## 19 MAR 2021
* *4.5 hours* - fixed bibliography issues, cited more up to date sources and added all proper appendix data


## Week 11 (15)
## 23 MAR 2021
* *0.5 hours* - meeting with supervisor, Re-evaluated dissertation and discussed corrections
* *5.5 hours* - Re-wrote conculsion, abstract and evaluation section
## 25 MAR 2021
* *6 hours* - Tidied up project, made sure everything in the project was in order and fixed some small quality of life issues
## 29 MAR 2021
* *3 hours* - Found the source of a CSS issue in other browsers and re-wrote docummentation to implement a fix.





