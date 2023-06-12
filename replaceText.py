import os
import fileinput

def replace_text_in_folder(folder_path, search_text, replace_text):
    for root, dirs, files in os.walk(folder_path):
        for file in files:
            file_path = os.path.join(root, file)
            if file_path.endswith(".html"):
                print("Processing:", file_path)
                with fileinput.FileInput(file_path, inplace=True) as f:
                    for line in f:
                        line = line.replace(search_text, replace_text)
                        print(line, end='')
                print("File updated:", file_path)

# Example usage
parent_folder_path = r"C:\xampp\htdocs\industrialTimes"  # Replace with the path to your parent folder
search_text = '<div class="search-menu" id="search">\n                <i class="fa fa-search" aria-hidden="true"></i>\n            </div>'
replace_text = '<a href="search/" class="search-menu" id="search">\n                <i class="fa fa-search" aria-hidden="true"></i>\n            </a>'
replace_text_in_folder(parent_folder_path, search_text, replace_text)
