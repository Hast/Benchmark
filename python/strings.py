import time, hashlib

start = time.time()

prev = hashlib.md5(str(0).encode('utf-8')).hexdigest()
for i in range(1, 50):
    for j in range(1, 10000):
        cur = hashlib.md5(str(j).encode('utf-8')).hexdigest()
        result = cur + prev
        result = result[16:32]
        prev = cur

end = time.time()
print("{0} sec.".format(end - start))
