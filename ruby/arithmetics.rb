start_time = Time.now

prev = 1
(1..1000).each do |i|
  (1..10000).each do |j|
    result = j * prev
    result = result + prev
    result = result - prev
    result = result / prev
    prev = j
  end
end

end_time = Time.now
printf('%f sec', end_time - start_time)
