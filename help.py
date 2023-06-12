import os


folder_path = "association/"
search_text = """<a href="search/" class="search-menu" id="search">
                <i class="fa fa-search" aria-hidden="true"></i>
            </a>"""
replace_text = """<a href="../search/" class="search-menu" id="search">
                <i class="fa fa-search" aria-hidden="true"></i>
            </a>"""

# Get all .php files in the folder
php_files = [file for file in os.listdir(folder_path) if file.endswith(".php")]

# Iterate through each .php file and perform the replacement
for file_name in php_files:
    file_path = os.path.join(folder_path, file_name)
    
    # Read the content of the file with the appropriate encoding
    with open(file_path, "r", encoding="utf-8") as file:
        content = file.read()
    
    # Perform the replacement
    new_content = content.replace(search_text, replace_text)
    
    # Write the updated content back to the file
    with open(file_path, "w", encoding="utf-8") as file:
        file.write(new_content)

print("Text replacement completed!")
