from django.db import models
from django.contrib.auth.models import AbstractUser
# Create your models here.
class User(AbstractUser):
	Sex = ((0,"Male"),(1,"Female"),(2,"Other"))
	DOB = models.DateTimeField(blank = True, null = True)
	PhoneNumber = models.IntegerField(blank=True, null = True)
	username = models.CharField(max_length = 12, null = True, blank = True,unique=True)
	Address = models.CharField(max_length = 60, null = True, blank = True,)
# Create your models here.
class Category(models.Model):
	Name = models.CharField(max_length=30)
	Type = models.CharField(max_length=30,null = True)
	Price = models.IntegerField()
	Decription = models.TextField()
	Image = models.ImageField()
	def __str__(self):
		return self.Name

class Packet(models.Model):
	Name = models.CharField(max_length=30)
	CategoryID = models.ForeignKey(Category, default=None, on_delete=models.CASCADE, blank=True, null = True)
	Decription = models.TextField()
	def __str__(self):
		return self.Name
class Service(models.Model):
	Name = models.CharField(max_length=30)
	PacketID = models.ForeignKey(Packet, default=None, on_delete=models.CASCADE, blank=True, null = True)
	Decription = models.TextField()
	def __str__(self):
		return self.Name
class Tour_guide(models.Model):
	Name = models.CharField(max_length=30)
	Email = models.CharField(max_length = 60, null = True, blank = True,)
	PhoneNumber = models.IntegerField(blank=True, null = True)
	CategoryID = models.ForeignKey(Category, default=None, on_delete=models.CASCADE, blank=True, null = True)
	Decription = models.TextField()
	Status = ((0,"Free"),(1,"Busy"))
	def __str__(self):
		return self.Name
class Booking(models.Model):
	UserID = models.ForeignKey(User, default=None, on_delete=models.CASCADE, blank=True)
	CategoryID = models.ForeignKey(Category, default=None, on_delete=models.CASCADE, blank=True, null = True)
	PacketID = models.ForeignKey(Packet, default=None, on_delete=models.CASCADE, blank=True, null = True)
	ServiceID = models.ForeignKey(Service, default=None, on_delete=models.CASCADE, blank=True, null = True)
	Status = ((0,"Not yet started"),(1,"started"),(2,"Accomplished"))
class Contacts(models.Model):
	Name = models.CharField(max_length=30)
	Email = models.CharField(max_length = 60, null = True, blank = True,)
	PhoneNumber = models.IntegerField(blank=True, null = True)
	Decription = models.TextField()