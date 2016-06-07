import time, hashlib

start = time.time()

prev = hashlib.md5(str(0).encode('utf-8')).hexdigest()
for i in range(1, 1000):
    array = []
    for j in range(1, 1000):
        array.append(hashlib.md5(str(j).encode('utf-8')).hexdigest())
    array.sort()

end = time.time()
print("{0} sec.".format(end - start))
