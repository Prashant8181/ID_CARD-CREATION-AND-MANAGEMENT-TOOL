from PIL import Image, ImageDraw, ImageFont, ImageOps
import json
import os
# Dimensions of the ID card in cm
width_cm = 5.5
height_cm = 8.5

# DPI (dots per inch) for conversion
dpi = 300

# Convert dimensions to pixels
width_px = int(width_cm * dpi / 2.54)
height_px = int(height_cm * dpi / 2.54)

# Create a blank white ID card
id_card = Image.new("RGB", (width_px, height_px), "white")
draw = ImageDraw.Draw(id_card)

# Convert stripe dimensions to pixels
orange_height_px = int(0.8 * dpi / 2.54)  # 0.8 cm orange stripe
white_gap_px = int(0.1 * dpi / 2.54)      # 0.1 cm white gap
blue_line_px = int(0.1 * dpi / 2.54)      # 0.1 cm blue stripe

# Draw the orange stripe
draw.rectangle([0, 0, width_px, orange_height_px], fill="orange")

# Draw the blue stripe below the white gap
draw.rectangle([0, orange_height_px + white_gap_px, width_px, orange_height_px + white_gap_px + blue_line_px], fill="blue")

script_dir = os.path.dirname(os.path.abspath(__file__))  
data_path = os.path.join(script_dir, "data.json")  

# Load user data from JSON file
with open(data_path, "r") as file:
    user_data = json.load(file)

# Logo placement details
logo_width_px = 120  # Logo width in pixels
logo_height_px = 120  # Logo height in pixels

# Provide the logo file path
logo_path = "C:\\Users\\Prashant\\OneDrive\\Documents\\python ex\\logo.jpg"
logo = Image.open(logo_path).resize((logo_width_px, logo_height_px))

# Position the logo on the left side of the ID card
logo_x = 10  # 10 px padding from the left edge
logo_y = int(orange_height_px + white_gap_px + blue_line_px + 10)  # Below the header
id_card.paste(logo, (logo_x, logo_y))

# Font paths for IDLE
font_path = font_path = "C:\\xampp\\htdocs\\Project\\Home\\python\\dejavu-fonts-ttf-2.37\\dejavu-fonts-ttf-2.37\\ttf\\DejaVuSans-Bold.ttf"
font_small = ImageFont.truetype(font_path, 15)
font_medium = ImageFont.truetype(font_path, 24)
font_large = ImageFont.truetype(font_path, 30)

available_width = width_px - logo_width_px - 20  # 10 px padding from both sides

# Define text lines
text_line_1 = "Suryadata Education Foundation's"
text_line_2 = "SURYADATTA COLLEGE"
text_line_3 = "of Management Information Research & Technology"
text_line_4 = "(SCMIRT)"

# Text placement details
text_start_x = logo_x + logo_width_px + 10  # Start after the logo with padding
text_start_y = orange_height_px + white_gap_px + blue_line_px + 10

draw.text(((width_px - font_small.getbbox(text_line_1)[2]) // 2, text_start_y), text_line_1, fill="blue", font=font_small)
text_start_y += font_small.getbbox(text_line_1)[3] + 5

draw.text((text_start_x, text_start_y), text_line_2, fill="red", font=font_large)
text_start_y += font_large.getbbox(text_line_2)[3] + 5

draw.text((text_start_x, text_start_y), text_line_3, fill="blue", font=font_small)
text_start_y += font_small.getbbox(text_line_3)[3] + 5

draw.text(((width_px - font_large.getbbox(text_line_4)[2]) // 2, text_start_y), text_line_4, fill="blue", font=font_large)

# Address details
address_text = "Sr.No.342, Bavdhan, Pune - 411021\nTel. 020-67901300, 08956932419"
address_font = ImageFont.truetype(font_path, 18)

line_1_y = text_start_y + font_large.getbbox(text_line_4)[3] + 10
draw.line((0, line_1_y, width_px, line_1_y), fill="black", width=2)

address_lines = address_text.split("\n")
address_y = line_1_y + 5

for line in address_lines:
    line_width = address_font.getbbox(line)[2]
    line_x = (width_px - line_width) // 2
    draw.text((line_x, address_y), line, fill="black", font=address_font)
    address_y += address_font.getbbox(line)[3]

draw.line((0, address_y + 5, width_px, address_y + 5), fill="black", width=2)

# Load user photo
# Ensure correct path
photo_dir = os.path.join(script_dir, "uploads")  # Get absolute path of 'uploads' folder
photo_path = os.path.join(photo_dir, user_data['photo'])  # Get full path to photo

if not os.path.exists(photo_path):  
    raise FileNotFoundError(f"Photo not found: {photo_path}")  # Debugging message

# Convert 2.0 cm to pixels (300 DPI)
photo_size_px = int(2.5 * dpi / 2.54)  # ~236 pixels

# Resize and center photo
user_photo = Image.open(photo_path).resize((photo_size_px, photo_size_px))

# Position the photo (centered horizontally, 0.1cm below black line)
photo_x = (width_px - photo_size_px) // 2  # Centered
photo_y = address_y + int(0.3 * dpi / 2.54)  # 0.1cm below black line
id_card.paste(user_photo, (photo_x, photo_y))

# Place user photo on left side below the black line
photo_x = 10
photo_y = address_y + int(0.1 * dpi / 2.54)  # Leave 0.1cm gap

# User details on right side
details_x = 20  # Start with some left padding
details_y = photo_y + photo_size_px + int(0.5 * dpi / 2.54)  # Leave 0.2cm gap below photo

# Ensure all text fits within the remaining 3cm (~354 pixels)
max_details_height = int(3.0 * dpi / 2.54)  # ~354 pixels

# Font size adjustments if needed
details_font = ImageFont.truetype(font_path, 30)

draw.text((details_x, details_y), f"Name: {user_data['name']}", fill="black", font=details_font)
details_y += 30
draw.text((details_x, details_y), f"Batch: {user_data['batch']}", fill="black", font=details_font)
details_y += 30
draw.text((details_x, details_y), f"Course: {user_data['course']}", fill="black", font=details_font)
details_y += 30
draw.text((details_x, details_y), f"Contact: {user_data['contact']}", fill="black", font=details_font)
details_y += 30
draw.text((details_x, details_y), f"Address: {user_data['address']}", fill="black", font=details_font)
details_y += 30
draw.text((details_x, details_y), f"Aadhar: {user_data['aadhar']}", fill="black", font=details_font)
# Convert strip dimensions to pixels
# Convert cm to pixels
dpi = 300  # Adjust this based on your image DPI
blue_height_px = int(0.5 * dpi / 2.54)  # 0.5 cm blue strip
orange_height_px = int(0.5 * dpi / 2.54)  # 0.5 cm orange strip
gap_px = int(0.1 * dpi / 2.54)  # 0.1 cm gap

# Calculate Y positions
blue_y = details_y + 65 # 20px extra gap after last detail
orange_y = blue_y + blue_height_px + gap_px  # Orange below blue with 0.1cm gap

# Draw blue strip
draw.rectangle([0, blue_y, width_px, blue_y + blue_height_px], fill="blue")

# Draw orange strip
draw.rectangle([0, orange_y, width_px, orange_y + orange_height_px], fill="orange")

# Save the image to a file

# Save the image first
output_path = os.path.join(os.getcwd(), "id_card.png")  # Get absolute path
id_card.save(output_path)  # Save the image
print(f"✅ ID card saved successfully at: {output_path}")  # Debugging message

# Show the image after saving
id_card.show()  
