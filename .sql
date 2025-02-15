CREATE TABLE Users (
    id SERIAL PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    role VARCHAR(50) CHECK (role IN ('Admins', 'Proprietaires', 'Voyageurs'))
);

CREATE TABLE Categories (
    id SERIAL PRIMARY KEY,
    categoryName VARCHAR(255) NOT NULL
);

CREATE TABLE Profile (
    id SERIAL PRIMARY KEY,
    user_id INT NOT NULL,
    photo VARCHAR(255),
    location VARCHAR(255),
    categoryName VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES Users(id)
);

CREATE TABLE Ratings (
    id SERIAL PRIMARY KEY,
    logementId INT NOT NULL,
    voyageurId INT NOT NULL,
    rating INT CHECK (rating BETWEEN 1 AND 5),
    review TEXT,
    FOREIGN KEY (logementId) REFERENCES Logements(id),
    FOREIGN KEY (voyageurId) REFERENCES Users(id)
);

CREATE TABLE Messages (
    id SERIAL PRIMARY KEY,
    senderId INT NOT NULL,
    receiverId INT NOT NULL,
    messageText TEXT NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (senderId) REFERENCES Users(id),
    FOREIGN KEY (receiverId) REFERENCES Users(id)
);

CREATE TABLE promotion (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255),
    pourcentage_promotion INT,
    date_de_debut DATE,
    date_de_fin DATE
);

CREATE TABLE Annonces (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255),
    photo VARCHAR(255),
    description TEXT,
    prix NUMERIC,
    disponibilite VARCHAR(255),
    date_de_publication TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    category_id INT,
    promotion_id INT,
    FOREIGN KEY (promotion_id) REFERENCES promotion(id),
    FOREIGN KEY (category_id) REFERENCES Categories(id)
);

CREATE TABLE paiment (
    id SERIAL PRIMARY KEY,
    date_de_paiment TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Reservations (
    id SERIAL PRIMARY KEY,
    annoncesId INT NOT NULL,
    voyageurId INT NOT NULL,
    reservationDateDebut TIMESTAMP,
    reservationDateFin TIMESTAMP,
    paiment_id INT,
    FOREIGN KEY (annoncesId) REFERENCES Annonces(id),
    FOREIGN KEY (voyageurId) REFERENCES Users(id),
    FOREIGN KEY (paiment_id) REFERENCES paiment(id)
);
