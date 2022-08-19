docker build -t newtech_website .
docker run -dit --name newtech-website -p 80:80 omwitsa/newtech_website
