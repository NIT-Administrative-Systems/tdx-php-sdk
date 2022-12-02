<?php

namespace Northwestern\Sysdev\TeamDynamix\Api\Types;

enum TdxAppClass: string
{
    case TICKETS = 'TDTickets';
    case ANALYSIS = 'TDAnalysis';
    case ASSETS = 'TDAssets';
    case CHAT = 'TDChat';
    case CLIENT = 'TDClient';
    case COMMUNITY = 'TDCommunity';
    case FILE_CABINET = 'TDFileCabinet';
    case FINANCE = 'TDFinance';
    case KNOWLEDGE_BASE = 'TDKnowledgeBase';
    case MY_WORD = 'MyWork';
    case NEWS = 'TDNews';
    case PEOPLE = 'TDPeople';
    case PORTFOLIO_PLANNING = 'TDPP';
    case PRORTFOLIOS = 'TDPortfolios';
    case PROJECT_REQUESTS = 'TDProjectRequest';
    case TEMPLATS = 'TDTemplate';
    case PROJECTS = 'TDProjects';
    case QUESTIONS = 'TDQuestions';
    case RESOURCE_MANAGEMENT = 'TDResourceManagement';
    case REQUESTS = 'TDRequests';
    case SURVEYS = 'TDSurveys';
    case TDNEXT = 'TDNext';
    case TICKET_REQUESTS = 'TDTicketRequests';
    case TIME_EXPENSE = 'TDTimeExpense';
    case WORKSPACE = 'TDWorkspaces';
}
