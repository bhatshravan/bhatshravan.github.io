# Hackathon  Problem Statement
# Barcodes for Dual Purpose

The present barcode system being used by the Department for tracking its shipments is a 13 digit linear barcode as per (Universal Postal Union) UPU standards. The pre-printed linier barcodes are linked to the consignments/shipments/articles at the time of booking. As the delivery PIN code information is not contained in these barcodes, OCR technology is being used at the Automated Mail Processing Centres (AMPCs) of the Department. Can we go for a different barcode structure which may facilitate easy and faster sorting at the AMPCs with higher capacity utilisation of the sorting machines?

Remember that the UPU code is internationally recognised Code!

Sample data required: No



# Solution

PDF417 Barcode 

PDF417 is a stacked linear barcode symbol format used in a variety of applications, primarily transport, identification cards, and inventory management. PDF stands for Portable Data File. The 417 signifies that each pattern in the code consists of 4 bars and spaces, and that each pattern is 17 units long

![Alt text](/images/pdf417_format.PNG)



# To build

1 Java Code for scanning the bar code and sorting 
 

    Create a folders of images
    Create a folder for each bin
    Code should fetch the images from the folder, scan it and put in to matching pin folder.
    
    
2 Android application for tracking of shipment and getting information from the bar code
   
    Should be able to capture bar code
    Scan the bar code
    Get the shipment information
    Show the map based on the delivery address
    Update the status when delivered


3 Presentation 
 







