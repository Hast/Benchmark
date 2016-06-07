import time

start = time.time()

prev = 1
for i in range(1, 1000):
    for j in range(1, 10000):
        result = j * prev
        result = result + prev
        result = result - prev
        result = result / prev
        prev = j

end = time.time()
print("{0} sec.".format(end - start))
