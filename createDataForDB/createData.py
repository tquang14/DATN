#!/usr/bin/python
import sys, getopt
import pymysql
def readAndWriteSQLfile(fileDir, newFileDir, date, _id):
    f = open(fileDir, "r")
    newF = open(newFileDir, "w")
    # contents = f.read()
    count = 0
    for line in f:
        tmp = line.replace("xxxx", _id)
        tmp = tmp.replace("yyyy-mm-dd", date)
        if count < 10:
            time = "0" + str(count - 1) + ":00:00" #first line of file is not a value
        else:
            time = str(count - 1) + ":00:00"
        tmp = tmp.replace("hh:mm:ss", time)
        newF.write(tmp)
        count = count + 1
    f.close()
    newF.close()

def get_sql_from_file(filename):
    from os import path
    # File did not exists
    if path.isfile(filename) is False:
        print("File load error : {}".format(filename))
        return False

    else:
        with open(filename, "r") as sql_file:
            # Split file in list
            ret = sql_file.read().split(';')
            # drop last empty entry
            ret.pop()
            return ret

def executeSQL(host, user, password, db, query):
    connection = pymysql.connect(host, user, password, db)
    cursor = connection.cursor()
    cursor.execute(query)
    connection.commit()
    connection.close()

def main(argv):
    inputfile = ''
    outputfile = ''
    date = ''
    _id = ''
    try:
        opts, args = getopt.getopt(argv,"hi:o:d::x:",["ifile=","ofile=","date=","id="])
    except getopt.GetoptError:
        print ('test.py -i <inputfile> -o <outputfile> -d <date> -x <id>')
        sys.exit(2)
    for opt, arg in opts:
        if opt == '-h':
            print ('test.py -i <inputfile> -o <outputfile> -d <date> -x <id>')
            sys.exit()
        elif opt in ("-i", "--ifile"):
            inputfile = arg
        elif opt in ("-o", "--ofile"):
            outputfile = arg
        elif opt in ("-d", "--date"):
            date = arg
        elif opt in ("-x", "--id"):
            _id = arg
    # print ('Input file is: ', inputfile)
    # print ('Output file is: ', outputfile)
    # print ('date is: ', date)

    readAndWriteSQLfile(inputfile, outputfile, date, _id)
    query  = get_sql_from_file(outputfile)
    for s in query:
        tmp = s.strip('\n')
    executeSQL('localhost', 'root', '', 'datn', tmp)

if __name__ == "__main__":
    main(sys.argv[1:])    