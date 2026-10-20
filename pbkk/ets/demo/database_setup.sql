-- ==============================================================
-- SKRIP SETUP DATABASE SKILLFORGE (SQL SERVER)
-- ==============================================================

IF NOT EXISTS (SELECT * FROM sys.databases WHERE name = 'SkillForge_DB')
BEGIN
    CREATE DATABASE SkillForge_DB;
END
GO

USE SkillForge_DB;
GO

-- 1. Hapus Tabel Lama Jika Ada (Reverse Order)
IF OBJECT_ID('InternshipApplications', 'U') IS NOT NULL DROP TABLE InternshipApplications;
IF OBJECT_ID('RoleRequirements', 'U') IS NOT NULL DROP TABLE RoleRequirements;
IF OBJECT_ID('InternshipRoles', 'U') IS NOT NULL DROP TABLE InternshipRoles;
IF OBJECT_ID('ProjectSkills', 'U') IS NOT NULL DROP TABLE ProjectSkills;
IF OBJECT_ID('Projects', 'U') IS NOT NULL DROP TABLE Projects;
IF OBJECT_ID('Skills', 'U') IS NOT NULL DROP TABLE Skills;
IF OBJECT_ID('SkillCategories', 'U') IS NOT NULL DROP TABLE SkillCategories;
IF OBJECT_ID('Users', 'U') IS NOT NULL DROP TABLE Users;
GO

-- 2. Pembuatan Tabel
CREATE TABLE Users (
    UserId INT IDENTITY(1,1) PRIMARY KEY,
    Username NVARCHAR(50) UNIQUE NOT NULL,
    PasswordHash NVARCHAR(255) NOT NULL,
    FullName NVARCHAR(100) NOT NULL,
    Role NVARCHAR(20) NOT NULL CHECK (Role IN ('Student', 'Reviewer')),
    CreatedAt DATETIME DEFAULT GETDATE()
);

CREATE TABLE SkillCategories (
    CategoryId INT IDENTITY(1,1) PRIMARY KEY,
    CategoryName NVARCHAR(50) NOT NULL,
    ColorHex NVARCHAR(10) DEFAULT '#6366F1'
);

CREATE TABLE Skills (
    SkillId INT IDENTITY(1,1) PRIMARY KEY,
    CategoryId INT FOREIGN KEY REFERENCES SkillCategories(CategoryId),
    SkillName NVARCHAR(50) UNIQUE NOT NULL,
    Description NVARCHAR(255) NULL
);

CREATE TABLE Projects (
    ProjectId INT IDENTITY(1,1) PRIMARY KEY,
    UserId INT FOREIGN KEY REFERENCES Users(UserId),
    Title NVARCHAR(150) NOT NULL,
    Description NVARCHAR(MAX) NULL,
    CourseName NVARCHAR(100) NOT NULL,
    DifficultyLevel INT NOT NULL CHECK (DifficultyLevel IN (1, 2, 3)),
    RepoUrl NVARCHAR(255) NULL,
    DemoUrl NVARCHAR(255) NULL,
    CreatedAt DATETIME DEFAULT GETDATE()
);

CREATE TABLE ProjectSkills (
    ProjectSkillId INT IDENTITY(1,1) PRIMARY KEY,
    ProjectId INT FOREIGN KEY REFERENCES Projects(ProjectId) ON DELETE CASCADE,
    SkillId INT FOREIGN KEY REFERENCES Skills(SkillId)
);

CREATE TABLE InternshipRoles (
    RoleId INT IDENTITY(1,1) PRIMARY KEY,
    RoleTitle NVARCHAR(100) NOT NULL,
    CompanyName NVARCHAR(100) NOT NULL,
    Location NVARCHAR(100) NOT NULL,
    JobType NVARCHAR(50) NOT NULL,
    Description NVARCHAR(MAX) NULL,
    MinProjectCount INT DEFAULT 1
);

CREATE TABLE RoleRequirements (
    RequirementId INT IDENTITY(1,1) PRIMARY KEY,
    RoleId INT FOREIGN KEY REFERENCES InternshipRoles(RoleId) ON DELETE CASCADE,
    SkillId INT FOREIGN KEY REFERENCES Skills(SkillId),
    ImportanceLevel DECIMAL(3,1) NOT NULL
);

CREATE TABLE InternshipApplications (
    ApplicationId INT IDENTITY(1,1) PRIMARY KEY,
    UserId INT FOREIGN KEY REFERENCES Users(UserId),
    RoleId INT FOREIGN KEY REFERENCES InternshipRoles(RoleId),
    Status NVARCHAR(50) NOT NULL CHECK (Status IN ('Wishlist', 'Applied', 'Interview', 'Offered')),
    AppliedAt DATETIME DEFAULT GETDATE()
);
GO

-- 3. Data Awal (Seed Data)
INSERT INTO Users (Username, PasswordHash, FullName, Role)
VALUES ('farrel', 'hash123', 'Farrel Prastita Ramadhan', 'Student');

INSERT INTO SkillCategories (CategoryName, ColorHex) VALUES 
('Backend & Languages', '#4F46E5'),
('Desktop & Framework', '#06B6D4'),
('Database', '#10B981'),
('Tools & Version Control', '#F59E0B');

INSERT INTO Skills (CategoryId, SkillName, Description) VALUES
(1, 'C#', 'Modern object-oriented language'),
(2, 'WPF', 'Windows Presentation Foundation desktop GUI'),
(3, 'SQL Server', 'Relational database management system'),
(4, 'Git', 'Distributed version control system'),
(1, 'Python', 'Scripting and logic programming');

INSERT INTO InternshipRoles (RoleTitle, CompanyName, Location, JobType, Description, MinProjectCount) VALUES
('.NET Desktop Software Engineer Intern', 'PT Inovasi Teknologi Nusantara', 'Surabaya (Hybrid)', 'Full-Time Intern', 'Pengembangan aplikasi desktop WPF enterprise', 2),
('Junior Database Administrator Intern', 'Bank Digital Nasional', 'Jakarta (Remote)', 'Internship', 'Optimasi kueri SQL dan pemeliharaan relasional', 1);

INSERT INTO RoleRequirements (RoleId, SkillId, ImportanceLevel) VALUES
(1, 1, 3.0),
(1, 2, 3.0),
(1, 3, 2.0),
(1, 4, 1.0);

INSERT INTO Projects (UserId, Title, CourseName, DifficultyLevel, RepoUrl, Description) VALUES
(1, 'SkillForge - Sistem Informasi Magang & Portofolio', 'Pemrograman Berbasis Kerangka Kerja', 2, 'https://github.com/Parellllll/SkillForge', 'Aplikasi desktop rich UI WPF dan MVVM');

INSERT INTO ProjectSkills (ProjectId, SkillId) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4);
GO
