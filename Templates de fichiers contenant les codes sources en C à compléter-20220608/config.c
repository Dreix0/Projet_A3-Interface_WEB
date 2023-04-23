// includes
#include "config.h"
#include "parsing.h"

#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <time.h>

#define MAX 100000

// fonction principale
int main(void){

	struct s_parametres* param; // structure contenant les parametres parses envoyes par le formulaires HTML

	// creation d'une structure vide pour contenir les parametres
	param = (struct s_parametres*)malloc(sizeof(struct s_parametres));

	printf("Content-Type: text/plain \n\n");
	printf("CGI C Capteur Configuration \n\n");

	// lecture des donnees du formulaire
	printf("-- Lecture du formulaire --\n");
	parse_formulaire(param);

	// affichage des donnees du formulaire
	printf("\n\n-- Affichage des données --\n");
	afficher_parametres(param);

	// traitement des donnees du formulaire
	printf("\n\n-- Traitement des données --");
	traiter_parametres(param);

	free(param);
	return EXIT_SUCCESS;
}

void afficher_parametres(struct s_parametres* param){
	if(param->frm_type == FRM_GET){
		printf("choix_capteur : %s\n", param->choix_capteur);
		printf("val_min : %f\n", param->val_min);
		printf("val_max : %f\n", param->val_max);
		printf("unite : %s\n", param->unite);
		printf("on_off : %d\n", param->on_off);
		printf("password : %d\n", param->password);
	}
	else{
		printf("choix_capteur : %s\n", param->choix_capteur);
		printf("range_lum : %d\n", param->range_lum);
		printf("code_maison : %d\n", param->code_maison);
		printf("on_off : %d\n", param->on_off);
		printf("password : %d\n", param->password);
	}
}

float generer_valeur_aleatoire(float v_min, float v_max){
	float val;
	int int_max = v_max*100, int_min = v_min*100;
	srand(time(NULL));
	val = rand()%(int_max - int_min+1) + int_min;
	val = val/100;
	return val;
}

// void commande_objet(char code_maison, int numero_objet, bool etat){
	//TODO
// }

void traiter_parametres(struct s_parametres* param){
	FILE* fichier;
	char path[250];
	int type = param->frm_type; 
	if(param->password != PASSWORD)
	{
		printf("\n\nMot de passe incorrect\n");
	}
	else{
		sprintf(path, "../%s.txt", param->choix_capteur);
		fichier = fopen(path, "w");
		
		if(param->on_off == 0)
			fprintf(fichier, "INACTIF");
		else{
			if(type == FRM_POST)
		     	fprintf(fichier, "%.0d", param->range_lum);
			else
				fprintf(fichier, "%.2f", generer_valeur_aleatoire(param->val_min, param->val_max));
			}
		printf("\n\nTraitement des données effectué\n");
		fclose(fichier);
	}		
}