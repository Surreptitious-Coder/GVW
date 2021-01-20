# GVWA

## About
-----------
The purpose of this program is to help beginner and intermediate users to hone their web exploitation and development skills by mirroring a vunerable e-commerce application. It also allows the user to make changes to the front and back end, with reset buttons provided if something goes wrong.

The program isn't perfect and only has a number of vulnerabilities, so feel free to add your own vulnerabilties.

This is purely for edcational purpose and so the creator does not condone the use of knowledge gained here for malicious purposes.

## Setup and Installation
------------------------

### Prerequisites
------------------
This program has only been tested on the Linux operating system, so it is recommended to use Linux as the choice of OS, specifically [Ubuntu](https://ubuntu.com/download/desktop)

The first program that needs to be installed is [Docker](https://docs.docker.com/engine/install/ubuntu/) as the program makes use of dockers containers, and it is essential that [Docker-Compose](https://docs.docker.com/compose/install/) is installed in order to build the container for the program.

Next it is recommended to use either [Google-Chrome](https://support.google.com/chrome/answer/95346?co=GENIE.Platform%3DDesktop&hl=en) or [Firefox](https://www.mozilla.org/en-GB/firefox/new/) as they are the only browsers to have been fully tested, any others might result in the CSS code to not render, as is the case with Chromium. For the best experience I recommend Google Chrome as there are a few external CSS packages invoked that only seem to run on Chrome, but they are aesthetic and do not add to the functionality of the website.

For web exploitation, it is necesary to install and use a web proxy to intercept and ghance requests. I made use of the [Burp-Suite](https://portswigger.net/burp/communitydownload) proxy.

The container takes up roughly 500MB of space as it also includes every dependency required to run it, including mySQL 5.7 and PHP 5.4.

### Running the program
-------------------------
1. On the linux operating system, open up the command line inside the folder containing the program.
2. Make the project folder writable and executable using:
```
sudo chmod -R 777 GVW
```
3. Make sure there are no processes using port **8080**, this can be done using the following line on linux:

```
netstat -aon | findstr 8080
```
And to kill the process:

```
sudo kill -9 [Process ID]
```

4. Use 'docker-compose' to build and run the program, using a line similar to:

```
sudo docker-compose up 
```


5. Check the program is working by accessing http://127.0.0.1:8080

6. To close the program go to the terminal and use Ctrl +C and then type in:
```
sudo docker-compose down
```
### Proxy setup
---------------------
For the web proxy, I used [Burp-Suite](https://portswigger.net/burp/communitydownload).

1. Install and setup the Burp Suite proxy using the link provided.
2. Setup the proxy to listen on an arbritrary port, I personally used **port 8100**.
3. Setup the browser of your choice to listen for a proxy on the same port as the one used above, usually done via Settings then search for proxy settings.

### Editing project code
---------------------------
It is recommended to clone the project and import it into [Visual Studio](https://code.visualstudio.com/download) in order to edit the code. **DO NOT EDIT** the folder labeled **copies** as that is used for resetting the front end or the backend if the user makes a change to the program that they wish to take back but for some reason cannot do so normally.

When making changes, if they are not immediately visible, try emptying the browser's cache, or by re building the container via:

```
sudo docker-compose build --no-cache
```
