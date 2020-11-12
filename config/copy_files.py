import sys
import os

def write_over(oldFile, newFile):
    print("Old file is ",oldFile)
    print("New file is ",newFile)

    with (open(newFile, 'r')) as f:
        data = f.read()
        print(data)

    with (open(oldFile, 'w')) as g:
        g.write(data)

    print("Data overwritten successfully")

def newFileFinder(oldFile):
    oldFile = oldFile.split("/")

    oldFile = oldFile[-3:]

    oldFile = ("/").join(oldFile)

    newFile = "../copies/" + oldFile

    return newFile

def OldFileFinder(oldFile):
    oldFile = oldFile.split("/")

    oldFile = oldFile[-3:]

    File = ("/").join(oldFile)

    oldFile = "../" + File

    return oldFile


oldFile = sys.argv[1]

#oldFile = OldFileFinder(oldFile)
newFile = newFileFinder(oldFile)

write_over(oldFile,newFile)


'''
<form action="../../config/reload.php?page_name">
    <input type="hidden" value="user_login_frontend" id="page_name" name="page_name"/>
    <input type="submit" value="Reset Login Frontend" />
</form>

<form action="../../config/reload.php?page_name">
    <input type="hidden" value="user_login_backend" id="page_name" name="page_name"/>
    <input type="submit" value="Reset Login backend" />
</form>
'''