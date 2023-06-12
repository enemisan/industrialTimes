import os

def create_php_files(names):
    name_list = names.split(',')
    for name in name_list:
        filename = name.strip() + '.php'
        with open(filename, 'w') as file:
            file.write('<?php\n')
            file.write('// This is a PHP file named ' + name.strip() + '\n')
            file.write('?>\n')
        print(f'{filename} created successfully!')

# Example usage:
file_names = input("Enter the names for PHP files (separated by commas): ")
create_php_files(file_names)
