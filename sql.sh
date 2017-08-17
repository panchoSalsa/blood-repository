#!/bin/bash

# for i in `seq 3 6`;
# do

#     for j in `seq 1 9`;
#     do
#     	echo "(" $i ", 'Rack " $j"', 'Freezer $i')," 

#     	# (2, 'Rack 9', 'Freezer 2')
#     done
# done 

# i=7

# #create racks


#     for j in `seq 1 9`;
#     do
#     	echo "(" $i ", 'Rack " $j"', 'Freezer $i')," 

#     	# (2, 'Rack 9', 'Freezer 2')
#     done


# create boxes

count=8

for i in `seq 1 64`;
do

    for j in `seq 1 8`;
    do
    	echo "(" $i ", 'Box $count')," 
    	count=$((count + 1))

    	# (2, 'Rack 9', 'Freezer 2')
    done
done 