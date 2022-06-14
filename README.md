 --- Project structure----

 ----FOLDER ADMIN----

Contails all the file and methods to store and fetch data to admin platform
 i) charts --- contains charts for and graphs
 ii) completed tasks -- contains all the completed tasks (paps instaled and turned on by techies and maton respectively for the last 35 days)
 iii) dashboard -- contains overview of the signed,pending installed and turned on 
       signed - all paps with status signed,Installed,Turned on,Assigned plus others from table old
       pending installations - all paps with status Signed,Assigned ans Restored
       Installed - All paps with status installed and existed in table papinstalled
       Turned On - all paps with status turned on and exists in table turnedonpap plus others table old
       restituted - all paps with status restituted and exists in table papnotinstalled
       