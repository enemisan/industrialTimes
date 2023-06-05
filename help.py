import os


folder_path = "news/"
search_text = """<li><a href="../association/">Association</a></li>
                        <li><a href="#">Commerce</a></li>
                        <li><a href="#">Business</a></li>
                        <li><a href="#">Contacts</a></li>
                        <li><a href="../">Home</a></li>"""
replace_text = """<li><a href="">About</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="../">Home</a></li>"""

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
