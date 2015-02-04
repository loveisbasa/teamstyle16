# -*- coding: utf-8 -*-
from threading import Thread
import time
import commands
import threading
from time import ctime,sleep

#修饰器用于处理
class TimeoutException(Exception):
    pass

ThreadStop = Thread._Thread__stop#获取私有函数

def timelimited(timeout):
    def decorator(function):
        def decorator2(*args,**kwargs):
            class TimeLimited(Thread):
                def __init__(self,_error= None,):
                    Thread.__init__(self)
                    self._error =  _error
                    
                def run(self):
                    try:
                        self.result = function(*args,**kwargs)
                    except Exception,e:
                        self._error =e

                def _stop(self):
                    if self.isAlive():
                        ThreadStop(self)

            t = TimeLimited()
            t.start()
            t.join(timeout)
     
            if isinstance(t._error,TimeoutException):
                t._stop()
                raise TimeoutException('timeout for %s' % (repr(function)))

            if t.isAlive():
                t._stop()
		(status, output) = commands.getstatusoutput('docker kill'+)
                print "wrong"

            if t._error is None:
                return 1

        return decorator2
    return decorator

docker_id=[]
@timelimited(5)
def open_docker(user_id)
    (status,output) = commands.getstatusoutput('docker run -rm -v /home/duishi16/teamstyle16/public/online_compile/'+user_id+'/:/home/ -e user_id='+user_id+' online_battle:fix_bug')      
    return;

threads = []
if __name__ == '__main__':  
    import socket  
    sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)  
    sock.bind(('', 8001))  
    sock.listen(5)  
    while True:  
        connection,address = sock.accept()  
        try:  
            connection.settimeout(15)  
            buf = connection.recv(1024)
            buf =buf.split('\n')
            print buf   
            if buf[0] == 'c':  
                connection.send('welcome to server!')
                t = threading.Thread(target=open_docker,args=(buf[1],))
                trr = [元素].setDaemon(True)
                t.start()
            else:  
                connection.send('Not Support')  
        except socket.timeout:  
            print 'time out'  
        connection.close()  
